@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="background-color: #FFDAB9; /* coral */">
                <div class="card-header" style="background-color: #FFA07A; /* lightsalmon */">
                    Gestão de Tarefas
                </div>
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Tarefas</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('newcard')}}" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Adicionar
                                Tarefa</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Calendário</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Categorias</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Prioridade</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #4B0082; /* indigo */"
                                onmouseover="this.style.backgroundColor='#9370DB'; this.style.color='#fff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4B0082';">Lembretes</a>
                        </li>
                        <hr style="border: 1px solid #4B0082; /* indigo */">
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-md-9">
            <div class="row">
                @foreach ($tasks as $task)
                    <div class="col-md-4">
                        <div class="card mb-3" style="background-color: #E6E6FA; /* lavender */">
                            <div class="card-header" style="background-color: #9370DB; /* medium purple */ color: #FFF;">
                                {{ $task->title }}
                            </div>
                            <div class="card-body" style="background-color: #FFF; color: #4B0082; /* indigo */">
                                <p class="card-text">
                                    {{ Str::limit($task->description, 40) }}
                                    <span class="d-none">{{ $task->description }}</span>
                                </p>

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalTarefa{{ $task->id }}">
                                    Ver mais
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalTarefa{{ $task->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalTarefaLabel{{ $task->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="background-color: #F5DEB3; /* wheat */">
                                <div class="modal-header justify-content-between"
                                    style="background-color: #9370DB; /* peru */">
                                    <h5 class="modal-title" id="modalTarefaLabel{{ $task->id }}" style="color: #FFF;">
                                        {{ $task->description }}
                                    </h5>
                                    <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"
                                        style="position: absolute; right: 20px; top: 10px; width: 40px; height: 40px;
                                          background-color: transparent; border: none; outline: none; cursor: pointer;">
                                        <span aria-hidden="true"
                                            style="color: #333; font-size: 1.5rem; font-weight: bold;">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="background-color: #FFF;">
                                    <p id="modalTarefaDescription{{ $task->id }}"
                                        style="color: #8B4513; /* saddlebrown */">
                                        Progresso
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-primary').on('click', function() {
                var title = $(this).closest('.card').find('.card-header').text();
                var description = $(this).closest('.card').find('.card-text').text();

                $('#modalTarefaLabel').text(title);
                $('#modalTarefaDescription').text(description);

                $('#modalTarefa{{ $task->id }}').on('shown.bs.modal', function() {
                    $('#modalTarefaDescription').text(description);
                });

                $('#modalTarefa{{ $task->id }}').modal('show');
            });
            $('.modal-header .close').on('click', function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    </script>
@endsection
