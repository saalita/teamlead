@extends('layout')

@section('content')

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

    <span></span>
    <form class="order" enctype="multipart/form-data" action="{{route('saveOrder')}}" method="POST">
        <label for="name">Введите имя</label>
        <input type="text" id="name" name="name" required>
        <label for="phone">Введите номер телефона</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="8-906-000-0000" required>
        <label for="address">Введите адрес</label>
        <input type="text" id="address" name="address" required>
        <label for="rate">Выберите свой тариф</label>
        <select name="rate" id="rate" name="rate" required>
            @foreach ($rates as $rate)
                <option value="{{$rate->id}}">{{$rate->title}}</option>
            @endforeach
        </select>
        <label for="delivery_day">Выберите первый день доставки</label>
        <input type="date" name="delivery_day" id="delivery_day" required min="@php echo trim(date('Y-m-d', strtotime("+1 day"))) @endphp"/>
        <input type="submit" value="Оформить заказ">
    </form>

    <script>
        $(document).ready(function()
            {
                let selectedRate = 1;
                $('#rate').change(function() {
                    selectedRate = $(this).val();
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        data: {rateId: selectedRate},
                        url: '/api/rates/' + selectedRate,
                        success: (data) => {
                            $('#delivery_day').attr('min', data);
                        },
                    });
                });
                $('.order').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "{{route('saveOrder')}}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name: $('#name').val(),
                            phone: $('#phone').val(),
                            address: $('#address').val(),
                            rate: $('#rate').val(),
                            delivery_day: $('#delivery_day').val(),
                        },
                        success: (data) => {
                            $('.order').trigger('reset');
                            alert('Спасибо за заказ!');
                        }
                    });
                })
            });
    </script>
@endsection


