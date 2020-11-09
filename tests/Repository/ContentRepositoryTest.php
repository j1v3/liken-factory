<?php

namespace App\Tests\Repository;

use App\Entity\Content;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContentRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByTitle()
    {
        $content = $this->entityManager
            ->getRepository(Content::class)
            ->findByTitle("Content1")
        ;

        dump($content);die();
        $this->assertSame("Content1", $content);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
