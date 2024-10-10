<?
namespace App\Repository\Interface;

interface HttpDataInterface
{
    public function find(string $url): array;
}