<x-layout>
    <h1 class='font-bold text-center text-4xl mb-10'>See All available books</h1>
    <ul>
        @foreach($books as $item)
           <li> 
            <x-bookCard href="{{route('books.about',$item->id)}}"  :highlight="true">
                <p>{{$item['title']}}</p>
            </x-bookCard>
            </li> 
        @endforeach
    </ul>
</x-layout>
  {{-- <p>{{$item['title']}}</p>
            <a href="/books/{{$item['id']}}">View details</a> --}}