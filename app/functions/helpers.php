<?php

use App\Classes\User;
use app\models\Model;
use app\classes\Flash;
use app\classes\Login;
use app\classes\Redirect;
use app\validate\Sanitize;

function dd($dump)
{
  var_dump($dump);
  die();
}

function toJason($data)
{
  header('Content-Type: application/json');
  echo json_encode($data);
}

function validate($validate)
{
  $validate = new $validate();

  $validate->validate();

  return $validate;
}

function request($field = null)
{
  $sanitized = new Sanitize;

  if(!is_null($field)){
    return $sanitized->sanitized()->$field;
  }
  return $sanitized->sanitized();
}

function auth(Model $model)
{
  return (new Login)->login($model);
}

function redirect($target)
{
  return Redirect::redirect($target);
}

function back()
{
  return Redirect::back();
}

function flash($messages)
{
  return Flash::add($messages);
}

function message($index)
{
  return Flash::get($index);
}

function logged()
{
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}
