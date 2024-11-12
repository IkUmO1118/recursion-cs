'use client';
import { useState } from 'react';
import Input from './Input';

function Container() {
  const [commands, setCommands] = useState<string[]>([]);

  return (
    <main className='bg-slate-900 h-full rounded-b-md p-2 flex flex-col'>
      <div className='h-full'>
        {commands.map((command, i) => (
          <div key={i} className='flex text-white'>
            <p>Recursion:&nbsp;</p>
            <p>ikumo&gt;</p>
            <p>math-tools&gt;&nbsp;</p>
            {command}
          </div>
        ))}
      </div>
      <Input onCommands={setCommands} />
    </main>
  );
}

export default Container;
