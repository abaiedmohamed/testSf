<?

namespace App\Dto;

class Video
{
    private string $id;

    private string $iso6391;

    private string $iso31661;

    private string $name;

    private string $key;

    private string $site;

    private string $size;

    private string $type;

    private string $official;

    private string $publishedAt;


    public function getId(): string
    {
        return $this->id;
    }


    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): self
    {
        $this->iso6391 = $iso6391;

        return $this;
    }


    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): self
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }


    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOfficial(): string
    {
        return $this->official;
    }

    public function setOfficial(string $official): self
    {
        $this->official = $official;

        return $this;
    }

    public function getPublishedAt(): string
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(string $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
}
