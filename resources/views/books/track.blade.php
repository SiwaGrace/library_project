<x-layout>
  <div class="overflow-x-auto shadow-lg rounded-lg">
    <table class="min-w-full bg-white divide-y divide-gray-200">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Assignee</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Book</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Borrowed</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Due</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Returned</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach($records as $r)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $r->assignee_name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $r->book->title }}</td>
            <td>{{ $r->borrowed_at->format('d M Y') }}</td>
<td>{{ $r->due_date ? $r->due_date->format('d M Y') : '-' }}</td>
<td>{{ $r->returned_at ? $r->returned_at->format('d M Y') : '-' }}</td>

            <td class="px-6 py-4 whitespace-nowrap">
              @if($r->status === 'borrowed')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Borrowed</span>
              @else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Returned</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-6">
      {{ $records->links() }}
  </div>
</x-layout>
