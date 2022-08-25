<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
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

        //lista todas as variáveis passíveis de serem capturadas da requisição, tanto do user quanto do sv
        //dd($request) 
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => " IP $ip requisitou a rota $rota"]);
        
        return $next($request);
    }
}
