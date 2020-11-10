<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Entity\Profil;
use App\Entity\Classe;
use App\Entity\Cours;
use App\Entity\Matiere;
use App\Form\CoursType;
use App\Form\ProfilType;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Mime\Message;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\UserRepository;
use App\Repository\ProfilRepository;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;

/**
 * @Route("/admin")
 */
class SystemeController extends AbstractController
{
    /**
     * @Route("/infos", name="systeme")
     */
    public function infos(){
        $a=$this->getUser();
        //var_dump($a);die();
        return new JsonResponse($a->getNom());
    }

    /**
     * @Route("/register", name="register", methods={"POST"})
     * @IsGranted({"ROLE_ADMIN"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, ValidatorInterface $validator, SerializerInterface $serializer){
         
        $user = new User();
         $form = $this->createForm(UserType::class, $user);
         $form->handleRequest($request);
         $values=$request->request->all();
         $form->submit($values);

        if ($form->isSubmitted()){
            $mdp="welcome";
             $user->setPassword(
                $passwordEncoder->encodePassword(
                $user, $mdp  )
                );

            // recuperer id profil
            $repos=$this->getDoctrine()->getRepository(Profil::class);
            $profils=$repos->find($values['profil']);
            $user->setProfil($profils);

            //var_dump($profils); die();

            $repo=$this->getDoctrine()->getRepository(Classe::class);
            $classes=$repo->find($values['classe']);
            $user->setClasse($classes);


            $role=[];
            if($profils->getLibelle() == "admin"){
                $role=(['ROLE_ADMIN']);
            }
            
            elseif($profils->getLibelle() == "user"){
                $role=(['ROLE_USER']);
            }
          

            $user->setRoles($role);
            $user->setStatut("debloquer");
            

            $errors=$validator->validate($user);
            if(count($errors)){
                $errors=$serializer->serialize($errors, 'json');
                return new Response ($errors, 500,[
                    'content_type'=>'application/json'
                ]);
            }
           // var_dump($user); die();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($user);
             $entityManager->flush();
             $data = [
                'status18' => 201,
                'message18' => 'L\'utilisateur a été créé'
            ];
            return new JsonResponse($data, 201);
         }
        $data = [
            'status2' => 500,
            'message2' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }


    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
      $this->encoder = $encoder;
    }

 /**
     * @Route("/addCours", name="addCours", methods={"POST"})
     * @IsGranted({"ROLE_ADMIN"})
     */
    public function addCours(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator, SerializerInterface $serializer){
         
        $cours = new Cours();
         $form = $this->createForm(CoursType::class, $cours);
         $form->handleRequest($request);
         $values=$request->request->all();
         $form->submit($values);

        if ($form->isSubmitted()){
        
            // recuperer id de la matiére
            $repos=$this->getDoctrine()->getRepository(Matiere::class);
            $matieres=$repos->find($values['matiere']);
            $cours->setMatiere($matieres);


         
            

            $errors=$validator->validate($cours);
            if(count($errors)){
                $errors=$serializer->serialize($errors, 'json');
                return new Response ($errors, 500,[
                    'content_type'=>'application/json'
                ]);
            }
           // var_dump($user); die();
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($cours);
             $entityManager->flush();
             $data = [
                'status18' => 201,
                'message18' => 'Le cours a été créé'
            ];
            return new JsonResponse($data, 201);
         }
        $data = [
            'status2' => 500,
            'message2' => 'Vous devez renseigner les clés username et password'
        ];
        return new JsonResponse($data, 500);
    }


}
