<?php
// validation messages
return [
    'custom' => [
        'name' => [
            'required' => 'Il campo :attribute è obbligatorio.',
            'string' => 'Il campo :attribute deve essere una stringa.',
            'max' => 'Il campo :attribute non può avere più di :max caratteri.'
        ],
        'description' => [
            'string' => 'Il campo :attribute deve essere una stringa.',
        ],
        'category_id' => [
            'required' => 'Il campo :attribute è obbligatorio.',
            'exists' => 'Seleziona una :attribute esistente.',
        ],
        'image' => [
            'image' => 'Il campo :attribute deve essere un\'immagine.',
            'mimes' => 'Il campo :attribute deve essere di tipo: jpeg, png, jpg, gif, svg.',
            'max' => 'Il campo :attribute non può essere più grande di :max kilobytes.',
        ],
        'price' => [
            'required' => 'Il campo :attribute è obbligatorio.',
            'numeric' => 'Il campo :attribute deve essere un numero.',
        ],
    ],

    'attributes' => [
        'name' => 'Nome',
        'description' => 'Descrizione',
        'category_id' => 'Categoria',
        'image' => 'Immagine',
        'price' => 'Prezzo'
    ]
];
