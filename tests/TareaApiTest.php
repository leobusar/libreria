<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TareaApiTest extends TestCase
{
    use MakeTareaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTarea()
    {
        $tarea = $this->fakeTareaData();
        $this->json('POST', '/api/v1/tareas', $tarea);

        $this->assertApiResponse($tarea);
    }

    /**
     * @test
     */
    public function testReadTarea()
    {
        $tarea = $this->makeTarea();
        $this->json('GET', '/api/v1/tareas/'.$tarea->id);

        $this->assertApiResponse($tarea->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTarea()
    {
        $tarea = $this->makeTarea();
        $editedTarea = $this->fakeTareaData();

        $this->json('PUT', '/api/v1/tareas/'.$tarea->id, $editedTarea);

        $this->assertApiResponse($editedTarea);
    }

    /**
     * @test
     */
    public function testDeleteTarea()
    {
        $tarea = $this->makeTarea();
        $this->json('DELETE', '/api/v1/tareas/'.$tarea->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tareas/'.$tarea->id);

        $this->assertResponseStatus(404);
    }
}
