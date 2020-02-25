<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Task;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     */
    public function index()
    {
        return $this->render('to_do_list/index.html.twig', [
            'controller_name' => 'ToDoListController',
        ]);
    }

    /**
     * @Route("/create", name="createtodo", methods={"POST"})
     */

    public function createTodo(Request $request)
    {
        
        $title = $request->get('title');
        $manager = $this->getDoctrine()->getManager();

        $task = new Task;
        $task->setTitle($title);

        $manager->persist($task);
        $manager->flush($task);
        return redirectTo('/');
    }
}
