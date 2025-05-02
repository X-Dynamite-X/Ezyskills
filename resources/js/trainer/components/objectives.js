// Course objectives functionality
import $ from "jquery";

export function initObjectives() {
    // Add objective
    $('#add-objective').on('click', function() {
        const newObjective = $(`
            <div class="objective-item flex items-center mb-2">
                <input type="text" name="objectives[]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#FF914C] focus:border-[#FF914C]" placeholder="e.g. Understand the basics of Angular.js">
                <button type="button" class="remove-objective ml-2 text-red-500 hover:text-red-700" title="Remove objective">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        `);
        $('#objectives-container').append(newObjective);

        // Add event listener to the new remove button
        newObjective.find('.remove-objective').on('click', function() {
            $(this).closest('.objective-item').remove();
        });
    });

    // Remove objective (for existing buttons)
    $(document).on('click', '.remove-objective', function() {
        $(this).closest('.objective-item').remove();
    });
}
