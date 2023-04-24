@extends(backpack_view('blank'))

@php
    Widget::add()
        ->type('style')
        ->content('assets/css/main.css');

    // Widget::add()
    //     ->type('script')
    //     ->content('assets/js/model.js');

    $programs = App\Models\Program::all();
@endphp

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong>
                                @php
                                    $weeks = Carbon\Carbon::now();
                                    $start = $weeks->startOfWeek()->format('d/m/Y');
                                    $end = $weeks->endOfWeek()->format('d/m/Y');
                                @endphp

                                {{ __('crud.program_weeks') }}:&nbsp;&nbsp;
                                {{ __('crud.from') }}: <?php echo $start; ?>&nbsp;&nbsp;
                                {{ __('crud.to') }}: <?php echo $end; ?>
                            </strong>
                        </div>
                        <table class="table table-responsive-sm table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">{{ __('crud.names') }}</th>
                                    @php
                                        $day = Carbon\Carbon::now();
                                        $date_weeks = [
                                            1 => 'Δευτέρα ' . $day->startOfWeek()->format('d/m'),
                                            2 => 'Τρίτη ' . $day->addDay()->format('d/m'),
                                            3 => 'Τετάρτη ' . $day->addDay()->format('d/m'),
                                            4 => 'Πεμπτή ' . $day->addDay()->format('d/m'),
                                            5 => 'Παρασεκύη ' . $day->addDay()->format('d/m'),
                                            6 => 'Σαββατό ' . $day->addDay()->format('d/m'),
                                            7 => 'Κυριακή ' . $day->endOfWeek()->format('d/m'),
                                        ];
                                    @endphp
                                    @for ($i = 1; $i <= 7; $i++)
                                        <th scope="col"><?php echo $date_weeks[$i]; ?></th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                    <tr class="text-center">
                                        {{--
                                            @if ($program->employee->id >= $program->employee_id)
                                                <td scope="row"></td>
                                            @else
                                                <td class="text-center">
                                                    <a href="{{ url('admin/employee/create') }}" target="_blank">
                                                        <i class="la la-plus-circle"></i>
                                                    </a>
                                            @endif
                                                </td>
                                        --}}

                                        <td scope="row">
                                            <a href="{{ url('admin/program/') }}">
                                                {{ $program->employee->name }}
                                            </a>
                                        </td>
                                        @for ($k = 1; $k <= 7; $k++)
                                            @if (date_format($program->date, 'N') == $k)
                                                <td style="background-color: {{ $program->shift->color }}; color: #fff;">
                                                    {{ $program->shift->time_shift }}
                                                    <a href="{{ url('admin/program', ['id' => $program->id]) }}/edit" target="_blank">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @else
                                                <td class="text-center">
                                                    <a href="{{ url('admin/program/create') }}" target="_blank">
                                                        <i class="la la-plus-circle"></i>
                                                    </a>
                                            @endif
                                                </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary float-right">
                            <i class="la la-envelope"></i> Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="emp_task">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100">Employee Tasks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>{{ __('crud.time_shift') }}:</strong> {{ $program->shift->time_shift }}<br>
                    <strong>{{ __('crud.areas') }}:</strong> {{ $program->area->name }}<br>
                    <strong>{{ __('crud.tasks') }}:</strong> {{ $program->tasks[0]->name }}<br>
                    <strong>{{ __('crud.group_tasks') }}:</strong> {{ $program->groupTasks->name }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
