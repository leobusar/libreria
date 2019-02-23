<?php

use App\Models\Tarea;
use App\Repositories\TareaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TareaRepositoryTest extends TestCase
{
    use MakeTareaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TareaRepository
     */
    protected $tareaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tareaRepo = App::make(TareaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTarea()
    {
        $tarea = $this->fakeTareaData();
        $createdTarea = $this->tareaRepo->create($tarea);
        $createdTarea = $createdTarea->toArray();
        $this->assertArrayHasKey('id', $createdTarea);
        $this->assertNotNull($createdTarea['id'], 'Created Tarea must have id specified');
        $this->assertNotNull(Tarea::find($createdTarea['id']), 'Tarea with given id must be in DB');
        $this->assertModelData($tarea, $createdTarea);
    }

    /**
     * @test read
     */
    public function testReadTarea()
    {
        $tarea = $this->makeTarea();
        $dbTarea = $this->tareaRepo->find($tarea->id);
        $dbTarea = $dbTarea->toArray();
        $this->assertModelData($tarea->toArray(), $dbTarea);
    }

    /**
     * @test update
     */
    public function testUpdateTarea()
    {
        $tarea = $this->makeTarea();
        $fakeTarea = $this->fakeTareaData();
        $updatedTarea = $this->tareaRepo->update($fakeTarea, $tarea->id);
        $this->assertModelData($fakeTarea, $updatedTarea->toArray());
        $dbTarea = $this->tareaRepo->find($tarea->id);
        $this->assertModelData($fakeTarea, $dbTarea->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTarea()
    {
        $tarea = $this->makeTarea();
        $resp = $this->tareaRepo->delete($tarea->id);
        $this->assertTrue($resp);
        $this->assertNull(Tarea::find($tarea->id), 'Tarea should not exist in DB');
    }
}
