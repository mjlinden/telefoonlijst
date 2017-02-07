<?php
namespace AppBundle\Handler;

use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
/**
 * Custom authentication success handler
 *
 * Defines what happens after login success
 */
class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var Router $router
     */
    protected $router;
    /**
     * @var AuthorizationChecker $authorizationChecker
     */
    protected $authorizationChecker;
    public function __construct(Router $router, AuthorizationChecker $authorizationChecker)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
    }
    /**
     * Called when authentication succeeds
     *
     * @param  Request          $request
     * @param  TokenInterface   $token
     *
     * @return Response never null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('homepage'));
        }
        elseif ($this->authorizationChecker->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('beheer'));
        }
        elseif ($this->authorizationChecker->isGranted('ROLE_USER'))
        {
            $response = new RedirectResponse($this->router->generate('edit'));
        }
        return $response;
    }
}