<?php

namespace App\Controller;

use App\Entity\MoyTransport;
use App\Entity\Reservation;
use App\Form\MoyTransportType;
use App\Form\Reservation1Type;
use App\Repository\MoyTransportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moy/transport")
 */
class MoyTransportController extends AbstractController
{
    /**
     * @Route("/", name="moy_transport_index", methods={"GET"})
     */
    public function index(MoyTransportRepository $moyTransportRepository): Response
    {
        return $this->render('moy_transport/index.html.twig', [
            'moy_transports' => $moyTransportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="moy_transport_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $moyTransport = new MoyTransport();
        $form = $this->createForm(MoyTransportType::class, $moyTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($moyTransport);
            $entityManager->flush();

            return $this->redirectToRoute('moy_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moy_transport/new.html.twig', [
            'moy_transport' => $moyTransport,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="moy_transport_show", methods={"GET"})
     */
    public function show(MoyTransport $moyTransport): Response
    {
        return $this->render('moy_transport/show.html.twig', [
            'moy_transport' => $moyTransport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="moy_transport_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, MoyTransport $moyTransport, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MoyTransportType::class, $moyTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('moy_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moy_transport/edit.html.twig', [
            'moy_transport' => $moyTransport,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}/new/Reservation2", name="reservation3_new", methods={"GET", "POST"})
     */
    public function new3(Request $request, EntityManagerInterface $entityManager ,$id,MoyTransport $moyTransport,MoyTransportRepository $moyTransportRepository   ): Response
    {
        $transport=$moyTransportRepository->find($id);
        $reservation = new Reservation();
        $form = $this->createForm(Reservation1Type::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setRef($transport->getId());
            $reservation->setName($transport->getName());
                  $reservation->setPrice($transport->getPrice());

            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('reservation2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('moy_transport/newReservation2.html.twig', [
            'reservation' => $reservation,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}", name="moy_transport_delete", methods={"POST"})
     */
    public function delete(Request $request, MoyTransport $moyTransport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moyTransport->getId(), $request->request->get('_token'))) {
            $entityManager->remove($moyTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('moy_transport_index', [], Response::HTTP_SEE_OTHER);
    }
}
