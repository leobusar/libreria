<?php

use Faker\Factory as Faker;
use App\Models\Tarea;
use App\Repositories\TareaRepository;

trait MakeTareaTrait
{
    /**
     * Create fake instance of Tarea and save it in database
     *
     * @param array $tareaFields
     * @return Tarea
     */
    public function makeTarea($tareaFields = [])
    {
        /** @var TareaRepository $tareaRepo */
        $tareaRepo = App::make(TareaRepository::class);
        $theme = $this->fakeTareaData($tareaFields);
        return $tareaRepo->create($theme);
    }

    /**
     * Get fake instance of Tarea
     *
     * @param array $tareaFields
     * @return Tarea
     */
    public function fakeTarea($tareaFields = [])
    {
        return new Tarea($this->fakeTareaData($tareaFields));
    }

    /**
     * Get fake data of Tarea
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTareaData($tareaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'category' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tareaFields);
    }
}
