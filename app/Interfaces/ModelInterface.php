<?

declare(strict_types=1);

namespace Welover\Interfaces;

interface ModelInterface
{
    public function getAll();
    public function getOne($id);
    public function create();
    public function delete($id);
}