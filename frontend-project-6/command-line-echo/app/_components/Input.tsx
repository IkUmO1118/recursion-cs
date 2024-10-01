'use client';

import { Dispatch, FormEvent, SetStateAction, useState } from 'react';

function Input({ onCommands }: {onCommands: Dispatch<SetStateAction<string[]>>}) {
  const [inputValue, setInputValue] = useState<string>('');

  function handleSubmit(e: FormEvent<HTMLFormElement>) {
    e.preventDefault();
    if (inputValue) {
      onCommands((prevCommands: string[]) => [...prevCommands, inputValue]);
      setInputValue('');
    }
  }

  return (
    <form onSubmit={handleSubmit}>
      <input
        type='text'
        className='w-full h-8 text-gray-600 rounded-sm px-3 py-2'
        placeholder='Type any command'
        value={inputValue}
        onChange={(e) => setInputValue(e.target.value)}
      />
    </form>
  );
}

export default Input;
