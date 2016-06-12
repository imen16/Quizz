<?php
namespace AppBundle\Controller;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Dunglas\ApiBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends ResourceController{
    
    public function questionAction(Request $request){
       $idCategorie = $request->get('id');
       $em = $this->getDoctrine()->getManager();
       $categorie = $em->getRepository('AppBundle:Categorie')->find($idCategorie);
       $questions = $em->getRepository('AppBundle:Question')->findBy(array('categorie' => $categorie)); 
        return $this->getSuccessResponse(
                $this->get('resource.question'),
                $questions,
                200,
                array(), 
                ['request_uri' => $request->getRequestUri()]
            );
    }
    
    
}