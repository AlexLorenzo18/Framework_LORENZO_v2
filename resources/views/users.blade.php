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
<thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>competences</td>
        </tr>
    </thead>
    <tbody>
        
           
            <tr>
                <th> {{ $users -> id }} </th>
                <td> {{ $users -> name }} </td>
                <td> {{ $users -> email }} </td>
                <td>
                    @foreach ($users->competences as $competence)
                        {{ $competence -> name }} {{ $competence->pivot -> level }}
                    @endforeach
                </td>
            </tr>
        
</table> 

<a href="{{ route('competence_user_member') }}">Ajouter une Compétence</a>
</body>
</html>
@endsection