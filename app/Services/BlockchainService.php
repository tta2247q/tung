<?php

namespace App\Services;

use App\Models\Block;

class BlockchainService
{

    public function createBlock($data)
    {

        $lastBlock = Block::orderBy('block_index', 'desc')->first();

        if (!$lastBlock) {
            $previous_hash = "0000";
            $index = 1;
        } else {
            $previous_hash = $lastBlock->hash;
            $index = $lastBlock->block_index + 1;
        }

        $timestamp = time();

        $hash = hash(
            'sha256',
            $index . $timestamp . json_encode($data) . $previous_hash
        );

        Block::create([
            'block_index' => $index,
            'data' => json_encode($data),
            'previous_hash' => $previous_hash,
            'hash' => $hash
        ]);

        return $hash;
    }
}
