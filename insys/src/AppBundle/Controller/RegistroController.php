<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Entity\UsuarioCampoAfin;
use AppBundle\Form\UsuarioType;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;
class RegistroController extends Controller
{
    /**
     * @Route("/registrar", name="homepage")
     */
    public function usuarioAction(Request $request)
    {
        $usuario = new Usuario();
        $usuario->setNombre("");
        $usuario->setEmail("");
        $usuario->setApellido("");
        $usuario->setPassword("");
        $usuario->setHabilitado(true);


        $form = $this->createFormBuilder($usuario)
            ->add('Nombre', TextType::class)
            ->add('Email', EmailType::class)
            ->add('Apellido', TextType::class)
            ->add('Password', PasswordType::class)
            ->add('Guardar', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $form->getData();
            $pasa = $this->getDoctrine() ->getManager();
            $pasa->persist($usuario);
            $pasa->flush();

            return $this->redirectToRoute('login');
        }
            return $this->render('security/registro.html.twig', array(
                'form' => $form->createView(),));



    }
        /**
         * @Route("/{id}", name="homepage2")
         *
         * @param Request $request
         * @param Usuario $usuario
         */
        public function ver_usuarioAction(Request $request, Usuario $usuario)

    {

        // replace this example code with whatever you need
        return $this->render('@App/Usuario/ver_usuario.html.twig',[
            "usuario" => $usuario
        ]);


    }


}
