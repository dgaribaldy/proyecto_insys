<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use AppBundle\Entity\CampoAfin;
use AppBundle\Form\CampoAfinType;
use AppBundle\Form\UsuarioType;
use AppBundle\Repository\campoAfinRepository;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\IntegerNode;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @property  createEditForm
 * @Route("/campoafin")
 */
class CampoAfinController extends Controller
{
    /**
     * @Route("/fin", name="campoafin_crear")
     */
    public function campoafinAction(Request $request)
    {

        $afin = new CampoAfin();
        $afin->getNombre("");


        $form = $this->createFormBuilder($afin)
            ->add('Nombre', TextType::class)
            ->add('Guardar', SubmitType::class, array('label' => 'Guardar'))
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $afin = $form->getData();
            $pasa = $this->getDoctrine()->getManager();
            $pasa->persist($afin);
            $pasa->flush();

            return $this->redirectToRoute('homepagefin');
        }
            return $this->render('security/campoafin.html.twig', array('form' => $form->createView(),));




    }

    /**
     * @Route("/todos", name="homepagefin")
     *
     * @param Request $request
     */
    public function verCampoAction(Request $request)
    {

        $campoAfines = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('@App/Usuario/ver_campo.html.twig', ["campoAfines" => $campoAfines]);


    }
//    /**
//     * @Route("/edit2/{id}", name="edit3")
//     */
//    public function editAction($id)
//
//    {
//      $ed = $this->getDoctrine()->getManager();
//      $user = $ed->getRepository('AppBundle\Entity\CampoAfin')->find($id);
//      if(!$user){
//        throw $this->createNotFoundException('no fund');
//      }
//      $form = $this->createEditForm($id);
//        return $this->render('@App/Usuario/editor.html.twig', array('user'=>$user, 'form'=>$form->createView()));
//    }
//    private function createEditForm(CampoAfin $campoAfin)
//    {
//        $af = new CampoAfin();
//        $af->getNombre("");
//    $fomr =$this->createForm(new $af(),$campoAfin, array('action'=>$this->generateUrl('@App/Usuario/editor.html.twig',
//        array('id'=>$campoAfin->getId())), 'method'=>'PUT'));
//    return $fomr;
//    }

    /**
     * @Route("/post/update/{id}", name="update_post")
     */
    public function updateAction(Request $request, $id)
    {
        $post = $this->getDoctrine()->getRepository('AppBundle\Entity\CampoAfin')->find($id);

        if (!$post) {
            return $this->redirectToRoute('homepagefin');
        }

        $form = $this->createForm(CampoAfinType::class, $post)
        ->add('Guardar', SubmitType::class, array('label' => 'Guardar'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('homepagefin', ["id" => $id]);
        }

        return $this->render('@App/Usuario/editor.html.twig', ["form" => $form->createView()]);
    }
    /**
     * @Route("/post/delete/{id}", name="delete_post")
     */
    public function deleteAction(Request $request, $id)
    {
        $ed = $this->getDoctrine()->getManager();
        $post = $ed->getRepository('AppBundle\Entity\CampoAfin')->find($id);

        if (!$post) {
            return $this->redirectToRoute('homepagefin');
        }

            $ed->remove($post);
            $ed->flush();
            return $this->redirectToRoute('homepagefin', ["id" => $id]);


        #return $this->render('@App/Usuario/editor.html.twig', ["form" => $form->createView()]);
    }
    /**
     * @Route("/get", name="homepageget")
     *
     * @param Request $request
     */
    public function getAction(Request $request)
    {

        $campoAfines = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();
        $campoAfines = $this->get('serializer')->serialize($campoAfines, 'json');
        $datajason = json_decode($campoAfines, true);
        return new JsonResponse($datajason);
        // replace this example code with whatever you need
        //return $this->render('@App/Usuario/ver_campo.html.twig', ["campoAfines" => $campoAfines]);


    }
    /**
     * @Route("/post", name="homepagepost", methods={"POST"})
     *
     * @param Request $request
     */
    public function postAction(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $afin = new CampoAfin();

        $form = $this->createFormBuilder(CampoAfin::class)
        //$afin->setNombre($data["nombre"]);
             ->getForm();
        $form->handleRequest($request);
          if ($form->isValid()) {
              $pasa = $this->getDoctrine()->getManager();
              $pasa->persist($afin);
              $pasa->flush();
          }
        $afin = $this->get('serializer')->serialize($afin, 'json');
        $datajason = json_decode($afin, true);
       return new JsonResponse($datajason);
////        $campoAfines = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();
////        $campoAfines = $this->get('serializer')->serialize($campoAfines, 'json');
//        $datajason = json_decode($campoAfines, true);
//        return new JsonResponse($datajason);
//        // replace this example code with whatever you need
//        //return $this->render('@App/Usuario/ver_campo.html.twig', ["campoAfines" => $campoAfines]);


    }
}
