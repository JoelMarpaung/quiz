@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">

            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.quizes.title')</span>
                    <span class="fa arrow"></span>
                </a>
            <ul class="sub-menu">
            <li class="{{ $request->segment(1) == 'tests' ? 'active' : '' }}">
                <a href="{{ route('tests.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.test.new')</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'results' ? 'active' : '' }}">
                <a href="{{ route('results.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.results.title')</span>
                </a>
            </li>
            </ul>
            </li>


            {{--  Quiz Management   --}}
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.make-quiz.title')</span>
                    <span class="fa arrow"></span>
                </a>
            <ul class="sub-menu">
            <li class="{{ $request->segment(1) == 'cari_perbedaan' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.cari-perbedaan.title')
                            </span>
                        </a>
            </li>

            <li class="{{ $request->segment(1) == 'cari_lokasi' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.cari-lokasi.title')
                            </span>
                        </a>
            </li>

            <li class="{{ $request->segment(1) == 'kecepatan_klik' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.kecepatan-klik.title')
                            </span>
                        </a>
            </li>

            <li class="{{ $request->segment(1) == 'ketangkasan_waktu' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.ketangkasan-waktu.title')
                            </span>
                        </a>
            </li>

             <li class="{{ $request->segment(1) == 'matematika' ? 'active active-sub' : '' }}">
                        <a href="{{ route('matematika.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.matematika.title')
                            </span>
                        </a>
            </li>

            <li class="{{ $request->segment(1) == 'memory_test' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.memory-test.title')
                            </span>
                        </a>
            </li>

            <li class="{{ $request->segment(1) == 'multiple_choice' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.multiple-choice.title')
                            </span>
                        </a>
            </li>



             <li class="{{ $request->segment(1) == 'puzzle' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.puzzle.title')
                            </span>
                        </a>
            </li>


             <li class="{{ $request->segment(1) == 'tebak_logo' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.tebak-logo.title')
                            </span>
                        </a>
            </li>

             <li class="{{ $request->segment(1) == 'tes_kepribadian' ? 'active active-sub' : '' }}">
                        <a href="{{ route('questions_options.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.tes-kepribadian.title')
                            </span>
                        </a>
            </li>
            </ul>
            </li>

            {{--  end  --}}





            {{--  Mulai ke bawah adalah menu untuk Admin  --}}

            @if(Auth::user()->isAdmin())
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.quiz-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
            <ul class="sub-menu">
            <li class="{{ $request->segment(1) == 'topics' ? 'active' : '' }}">
                <a href="{{ route('topics.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.topics.title')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'questions' ? 'active' : '' }}">
                <a href="{{ route('questions.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.questions.title')</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'questions_options' ? 'active' : '' }}">
                <a href="{{ route('questions_options.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.questions-options.title')</span>
                </a>
            </li>
            </ul>
            </li>


            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(1) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>

        <div class="text-center margin-top-20" style="color: white">
            Quiz Master by
            <br />
            <a href=" " target="_blank">KP Adikari Wisesa 2018</a>

            <br /><br />

            {{--  Feedback/questions?
            <br />
            <a href=" " target="_blank">KP Adikari Wisesa</a>  --}}
        </div>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
