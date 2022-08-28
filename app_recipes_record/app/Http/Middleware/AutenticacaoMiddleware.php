<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {

        if($metodo_autenticacao == 'padrao'){
            echo 'verificar usuário e senha no bd';
        }
        if($perfil == 'visitante'){
            echo 'Carregar apenas perfil do banco de dados';
        }
        //verifica se o usuário possui acesso à rota
        if(true){
            return $next($request);
        } else {
            Response ("Acesso negado! Esta rota exige autenticação!");
        }
    }
}
