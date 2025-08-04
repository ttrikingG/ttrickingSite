<?php
namespace app\models;

class ComentsTxt
{
    private string $diretorio;
    private string $arquivo;

    public function __construct()
    {
        $this->diretorio = dirname(__DIR__, 1) . '/storage';
        $this->arquivo = $this->diretorio . '/comentarios.txt';

        if (!is_dir($this->diretorio)) {
            mkdir($this->diretorio, 0777, true);
        }
    }

    public function salvar(int $post_id, string $nome, string $email, string $comentario): bool
    {
        $conteudo = $this->formatarComentario($post_id, $nome, $email, $comentario);
        $bytes = file_put_contents($this->arquivo, $conteudo, FILE_APPEND | LOCK_EX);

        return $bytes !== false;
    }


    private function formatarComentario(int $post_id, string $nome, string $email, string $comentario): string
    {
        $data = date('Y-m-d H:i:s');
        
        return "PostID: $post_id" . PHP_EOL .
            "Data: $data" . PHP_EOL .
            "Nome: $nome" . PHP_EOL .
            "Email: $email" . PHP_EOL .
            "Comentário: $comentario" . PHP_EOL .
            str_repeat("-", 30) . PHP_EOL;
    }


    public function listTxt()
    {
        $arquivo = $this->diretorio . '/comentarios.txt';

        if (!file_exists($arquivo)) {
            return [];
        }

        $conteudo = file_get_contents($arquivo);

        // Separar os comentários pelo separador ----
        $blocos = explode(str_repeat("-", 30), $conteudo);

        $comentarios = [];

        foreach ($blocos as $bloco) {
            $bloco = trim($bloco);
            if (empty($bloco)) continue;

            // Extrair linhas de dados
            preg_match('/Data: (.+)/', $bloco, $data);
            preg_match('/Nome: (.+)/', $bloco, $nome);
            preg_match('/Email: (.+)/', $bloco, $email);
            preg_match('/Comentário: (.+)/s', $bloco, $comentario);

            $comentarios[] = [
                'data' => $data[1] ?? '',
                'nome' => $nome[1] ?? '',
                'email' => $email[1] ?? '',
                'comentario' => $comentario[1] ?? '',
            ];
        }

        return $comentarios;
    }

    public function listPostId(int $postId): array
    {
        $arquivo = $this->arquivo;

        if (!file_exists($arquivo)) {
            return [];
        }

        $conteudo = file_get_contents($arquivo);
        $blocos = explode(str_repeat("-", 30), $conteudo);

        $comentarios = [];

        foreach ($blocos as $bloco) {
            $bloco = trim($bloco);
            if (empty($bloco)) continue;

            // Confirma se é do post desejado
            preg_match('/PostID: (\d+)/', $bloco, $matchId);
            if ((int)($matchId[1] ?? 0) !== $postId) continue;

            preg_match('/Data: (.+)/', $bloco, $data);
            preg_match('/Nome: (.+)/', $bloco, $nome);
            preg_match('/Email: (.+)/', $bloco, $email);
            preg_match('/Comentário: (.+)/s', $bloco, $comentario);

            $comentarios[] = [
                'post_id' => $postId,
                'data' => $data[1] ?? '',
                'nome' => $nome[1] ?? '',
                'email' => $email[1] ?? '',
                'comentario' => trim($comentario[1] ?? ''),
            ];
        }

        return $comentarios;
    }

}

