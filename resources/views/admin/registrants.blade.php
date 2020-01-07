@extends('layouts.admin.app')

@section('content')
    <div class="md:flex md:justify-between">

        <div class="bg-white rounded shadow p-4 w-full md:w-1/3">

            <h1 class="hidden md:block verygood-font text-xl">Select an Event</h1>

            <event-list></event-list>

        </div>

        <div class="bg-white rounded shadow p-4 w-full ml-4">

            <registrants-list></registrants-list>

        </div>

    </div>
@endsection
<script>
    import EventList from "../../js/components/EventList";
    export default {
        components: {EventList}
    }
</script>
<script>
    import RegistrantsList from "../../js/components/RegistrantsList";
    export default {
        components: {RegistrantsList}
    }
</script>