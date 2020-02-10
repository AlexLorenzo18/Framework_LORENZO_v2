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
        
            @foreach ($users as $user)
            <tr>
                <th> {{ $user -> id }} </th>
                <td> {{ $user -> name }} </td>
                <td> {{ $user -> email }} </td>
                <td>
                    @foreach ($user->competences as $competence)
                        {{ $competence -> name }} {{ $competence->pivot -> level }}
                    @endforeach
                </td>
            </tr>
            @endforeach
        
    </tbody>
</table>
 
</table> 

<a href="{{ route('competence_user_admin') }}">Ajouter une Compétence</a>
</body>
</html>
@endsection