<?php

namespace App\Imports;

use App\Models\Sufragante;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SufragantesTagsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $sufragante =  new Sufragante([
            'numeroDocumento' => $row['documento'],
            'nombres' => $row['nombres'],
            'email' => $row['correo'],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'genero' => $row['genero'],
            'estado' => $row['estado'],
            
        ]);
        $findSufragante = Sufragante::where('numeroDocumento', $row['documento'])->first();
        $tags = explode(', ', $row['etiquetas']);
        $tagsArray = [];
        
        foreach ($tags as $tag) {
            $etiqueta = Tag::where('nombre', $tag)->first();
            if ($etiqueta) {
                $tagsArray[] = $etiqueta->id;
            }
        
        }
        $findSufragante->tags()->sync($tagsArray);


        return $sufragante;
    }


    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    //método identificador para actualizar registros existentes
    public function uniqueBy()
    {
        return 'numeroDocumento';
    }
}
