<!DOCTYPE html>
<html>
<head>
    <title>Book {{ $book->id }}</title>
</head>
<body>
<h1>BookTitle: {{ $book->title }}</h1>
<ul>
    <li>Author First Name: {{ $book->authorfirstname }}</li>
    <li>Author Last Name: {{ $book->authorlastname }}</li>
    <li>Publishing Year: {{ $book->publishyear }}</li>
    <li>Price: {{ $book->price }}</li>
</ul>
</body>
</html>
