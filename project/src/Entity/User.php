<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups ("user:read");
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups ("user:read");
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups ("user:read");
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
    /**
     * @var
     */
    private $plainPassword;

    /**
     * @ORM\OneToMany(targetEntity=Question::class, mappedBy="owner")
     */
    private $no;

    public function __construct()
    {
        $this->no = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {

        return $this->password;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
         $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    public function getAvatarUri(int $size = 32){
        return 'https://ui-avatars.com/api/?' . http_build_query([
                'name' => $this->getDisplayName(),
                'size' => $size,
                'background' => 'random',
            ]);

    }

    public function getDisplayName(): string{

        return $this->getFirstName()?: $this->getEmail();
    }

    /**
     * @return Collection|Question[]
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(Question $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->setOwner($this);
        }

        return $this;
    }

    public function removeNo(Question $no): self
    {
        if ($this->no->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getOwner() === $this) {
                $no->setOwner(null);
            }
        }

        return $this;
    }
}
