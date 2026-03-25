<?php
use App\Http\Controllers\Controller;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function addBlock(Request $request)
    {
        $lastBlock = Block::orderBy('block_index', 'desc')->first();

        if ($lastBlock) {
            $index = $lastBlock->block_index + 1;
            $previousHash = $lastBlock->hash;
        } else {
            $index = 1;
            $previousHash = "0";
        }

        $data = $request->data;

        $hash = hash('sha256', $index . $data . $previousHash);

        Block::create([
            'block_index' => $index,
            'data' => $data,
            'previous_hash' => $previousHash,
            'hash' => $hash
        ]);

        return redirect('/');
    }
}