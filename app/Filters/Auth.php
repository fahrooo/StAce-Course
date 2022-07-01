<?php 
namespace App\Filters;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
 
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->get('logged_in') != TRUE){
            return redirect()->to('home/login');
        }
    }
 
    //--------------------------------------------------------------------
 
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();
        if ($session->get('role') == "user"){
            return redirect()->to('home/home'); 
        }
        // if ($session->get('logged_in') == TRUE && $session->get('role') == 'admin'){
        //     return redirect()->to('admin/index');
        // }
    }
}