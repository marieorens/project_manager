@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow rounded">
          <marquee behavior="scroll" direction="feft"><h1 class="text-3xl font-bold mb-6 text-gray-800">Bienvenue dans votre centre de notifications</h1></marquee>

        @if($tasks->isEmpty())
            <p class="text-gray-600">Aucune tâche assignée pour le moment.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tasks as $task)
                    <div class="p-4 bg-gray-100 rounded shadow hover:shadow-lg transition duration-300">
                        <h2 class="text-xl font-semibold text-blue-600">{{ $task->title }}</h2>
                        <p class="text-sm text-gray-500 mb-2">{{ $task->description ?? 'Aucune description' }}</p>
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><strong>Statut :</strong> 
                                <span class="px-2 py-1 rounded text-white 
                                    {{ $task->status == 'non commencé' ? 'bg-red-500' : ($task->status == 'en cours' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </p>
                            <p><strong>Priorité :</strong> {{ ucfirst($task->priority) }}</p>
                            <p><strong>Projet :</strong> {{ $task->project->title ?? 'Non associé à un projet' }}</p>
                        </div><br>
                        @if ($task->project)
                            <a href="{{ route('projects.show', $task->project->id) }}" 
                            class="bg-green-500 px-3 py-1 rounded">
                                Voir le projet
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
