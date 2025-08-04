<?php

namespace app\controllers\site;

use app\validate\site\Contact;
use app\services\MailService;
use app\controllers\ContainerController;

class ContactController extends ContainerController
{
    public function index()
    {
        $this->view([], 'site.header');

        $this->view([
            'title' => 'Contato',
        ], 'site.contact');

        $this->view([], 'site.footer');
        $this->view([], 'site.master');
    }

    public function enviar()
    {
        $validador = validate(Contact::class); // usa helper validate()

        if ($validador->hasErrors()) {
            flash($validador->getErrors());
            return back(); // mantém os dados e os erros
        }

        $titulo   = request('titulo');
        $assunto  = request('assunto');
        $mensagem = request('mensagem');

        $mailService = new MailService();
        $resultado = $mailService->sendMail(
            'teste@teste.com',
            $titulo,
            "<h1>{$titulo}</h1><h3>Assunto: {$assunto}</h3><p>{$mensagem}</p>"
        );

        flash($resultado === true
            ? ['success' => 'Mensagem enviada com sucesso!']
            : ['error' => $resultado]
        );

        return back(); // volta pra mesma página com a mensagem
}

}
