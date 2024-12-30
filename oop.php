<?php

class book{

private $title;
private $availableCopies;

public function __construct($title,$availableCopies)
{
    $this->title = $title;
    $this->availableCopies = $availableCopies;

}

public function getTitle()
{
    return $this->title;
}

public function getAvailableCopies()
{
    return $this->availableCopies;
}

public function borrowBook()
{
    if($this->availableCopies>0)
    {
        $this->availableCopies--;
        return true;
    }else{
        return false;
    }
}

public function returnBook()
{
    $this->availableCopies++;
}

}

class member{

    private $name;
    private $borrowedBook;

    public function __construct($name)
    {
        $this->name = $name;
        $this->borrowedBook = null;
    }

    public function getName()
    {
        return $this->name;
    }

    public function borrowBook($book)
    {
        if($book->borrowBook()){
            $this->borrowedBook = $book->getTitle();
            echo "{$this->name} successfully borrowed '{$book->getTitle()}'.\n"; 
        }else{
            echo "{$this->name} failed to borrow '{$book->getTitle()}'(No copies Available).\n";
        }

    }

  public function returnBook($book){
     if($this->borrowedBook === $book->getTitle())
     {
        $book->returnBook();
        $this->borrowedBook = null;
        echo "{$this->name} returned '{$book->getTitle}'.\n";
     }else{
        echo "{$this->name} does not have '{$book->getTitle()}'.\n";
     }
  }
        }

        $books =[];
        $members = [];
//add books 
$bookcount = (int)readline("Enter the number of books to add: ");
 for($i=0;$i<$bookcount;$i++)
 {
    $title = readline("Enter the tittle of book: " .($i+1).":");
    $copies = (int)readline("Enter the number your available copies: ");
    $books[] = new Book($title,$copies);
 }

 $memberCount = (int)readline("Enter the number of member to add: ");
 for($i=0; $i<$memberCount; $i++)
 {
    $name = readline("Enter the name of member" .($i+1).":");
    $members[] = new Member($name);
 }

 foreach($members as $member)
 {
    echo "borrowing for member: {$member->getName()}\n";
    foreach($books as $key => $book){
        echo "{$key} . {$book->getTitle()} ({$book->getAvailableCopies()} copies available)\n";
    }

    $bookindex = (int)readline("Enter the index of book to borrow: ");
    if(isset($books[$bookindex])){
        $member->borrowBook($books[$bookindex]);
    }else{
        echo "invalid book index.\n";
    }
}

    //print available copies with after browwing//
    echo "\nAvailable copies after borrowing:\n";

    foreach($books as $book)
    {
        echo "{$book->getTitle()}:{$book->getAvailableCopies()} copies available.\n";
    }

?>