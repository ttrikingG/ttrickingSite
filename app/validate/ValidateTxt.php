<?php
namespace app\validate;

class ValidateTxt
{
    private array $data;
    private array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->validate();
    }

    private function validate(): void
    {
        $this->errors['nome'] = empty($this->data['nome']) 
            ? 'Nome é obrigatório.' 
            : null;

        $this->errors['email'] = (empty($this->data['email']) || !filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) 
            ? 'Email inválido.' 
            : null;

        $this->errors['comentario'] = empty($this->data['comentario']) 
            ? 'Comentário é obrigatório.' 
            : null;

        $this->errors['post_id'] = (empty($this->data['post_id']) || !filter_var($this->data['post_id'], FILTER_VALIDATE_INT)) 
            ? 'Post inválido.' 
            : null;

        // Remove erros que ficaram como null
        $this->errors = array_filter($this->errors);
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getSanitized(): array
    {
        return [
            'nome' => htmlspecialchars(trim($this->data['nome'] ?? '')),
            'email' => htmlspecialchars(trim($this->data['email'] ?? '')),
            'comentario' => htmlspecialchars(trim($this->data['comentario'] ?? '')),
            'post_id' => (int) ($this->data['post_id'] ?? 0),
        ];
    }
}
