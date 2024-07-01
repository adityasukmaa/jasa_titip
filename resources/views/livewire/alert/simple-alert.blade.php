<x-adminlte-alert  x-data="{show: @entangle('show')}" x-show="show" theme="{{$theme}}" title="{{$title}}" >
    {{ $msg }}
</x-adminlte-alert>