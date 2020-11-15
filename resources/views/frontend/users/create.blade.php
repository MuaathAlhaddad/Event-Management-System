@extends('frontend.master' , ['page' => 'events_show'])
@section('content')
<style>
    th {
        color: {{config('styles.frondend.colors.primary')}};
    }
    table.table th {
        width: auto;
}
    #user-profile {
        color: {{config('styles.frondend.colors.primary')}};
    }
    #user-profile-container{
        padding: 10px;
        bottom: 450px;
        text-align: center;
        border-radius: 10px;
        background: white;
    }
    .card{
        padding-top: 20px;
        align-items: center;
    }
    .form-control{
        border: 1px solid #2dc997;
    }
    .select-all, .deselect-all{
        border: 1px solid #2dc997;
        background: #2dc997;
    }
    
</style>

<section id="portfolio" class="portfolio" style="margin-top: 4rem; height: 850px; color:black;">
    <div class="container" data-aos="fade-up">
        <div class="card" >
            <div  class=" display-4" style=" color: purple!important;">
                {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
            </div>

            <div class="card-body" style="border: 1px solid purple;">
                <form action="{{ route("frontend.users.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @user_form()
                </form>
            </div>
        </div>
    </div>
</section><!-- End Portfolio Section -->

@endsection