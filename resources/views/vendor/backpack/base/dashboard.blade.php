@extends(backpack_view('blank'))

@php
    Widget::add()
        ->type('style')
        ->content('assets/css/main.css');

    // Widget::add()
    //     ->type('script')
    //     ->content('assets/js/model.js');

    $weeks = Carbon\Carbon::now();
    $start = $weeks->startOfWeek()->format('d-m-Y');
    $end = $weeks->endOfWeek()->format('d-m-Y');

    $programs = App\Models\Program::all()->whereBetween('date', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()]);
@endphp

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong>
                                {{ __('crud.program_weeks') }}:&nbsp;&nbsp;
                                {{--
                                    <a href="">
                                        <i class="las la-caret-left"></i>
                                    </a>
                                --}}

                                {{ __('crud.from') }}: <?php echo $start; ?>&nbsp;&nbsp;
                                {{ __('crud.to') }}: <?php echo $end; ?>

                                {{-- <a href="">
                                    <i class="las la-caret-right"></i>
                                </a> --}}
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
                                        <td scope="row">
                                            <a href="{{ url('admin/program/') }}">
                                                {{ $program->employee->name }}
                                            </a>
                                        </td>
                                        @for ($i = 1; $i <= 7; $i++)
                                            @if (date_format($program->date, 'N') == $i)
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
@endsection
