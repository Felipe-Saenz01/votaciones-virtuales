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
            'estado' => $row['estado'],
            
        ]);
        $findSufragante = Sufragante::where('numeroDocumento', $row['documento'])->first();
        $tags = explode(', ', $row['etiquetas']);
        
        foreach ($tags as $tag) {
            $etiqueta = Tag::where('nombre', $tag)->first();
            if ($etiqueta && !$findSufragante->tags()->where('nombre', $tag)->exists()) {
                $findSufragante->tags()->save($etiqueta);
            }
        
        }


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
