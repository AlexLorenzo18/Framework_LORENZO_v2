@extends ('layouts.app')
@section('content')
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste de compétences</title>
</head>
<body>
<h1> Utilisateurs </h1>

<table>

  <tr>
  @foreach ($users as $users)
  <ul>
      <li> {{ $users -> id }} </li>
      <li> {{ $users -> name }} </li>
      <li> {{ $users -> email }} <li>
  @foreach ($users->competences as $competence)
      <li> {{ $competence -> name }} </li>
      <li> {{ $competence->pivot -> level }}</li>
      
  @endforeach
  </ul>
   @endforeach
      <br>
  </tr>
 
</table> 

<a href="{{ route('competence_user_admin') }}">Ajouter une Compétence</a>
</body>
</html>
@endsection