<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    /**
     * @Route("/api/send-request", name="api_send_request")
     */
    public function sendRequestAction(Request $request)
    {
        $client = new Client();

        // モック API の URL（ローカル環境の場合）
        $url = 'http://localhost:8080';

        // リクエストを送信
        $response = $client->request('GET', $url);

        // レスポンスの取得
        $data = json_decode($response->getBody(), true);

        // データをビューやレスポンスに渡す
        return $this->render('api/index.html.twig', ['data' => $data]);
    }
}
