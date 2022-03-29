@extends('gestion_authClass.layout')

@section('main')

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        (() => {
            var advanced = false
            $('#searchAdvanced').hide()

            $('#advanced').click((e) => {
                e.preventDefault()
                advanced = !advanced
                if (advanced) {
                    $('#search').fadeOut(300)
                    $('#searchAdvanced').show(600)
                    $('#advanced').text("Recherche Simple")
                }else{
                    $('#searchAdvanced').fadeOut(300)
                    $('#search').show(600)
                    $('#advanced').text("Recherche Avancée")
                }
            })
        })()
    </script>
@endsection
