import type { Metadata } from 'next';
import './globals.css';

export const metadata: Metadata = {
  title: 'Math tools',
  description: 'Recursion frontend_project | math tools',
};

function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang='en'>
      <body className='antialiased px-80 py-32 h-screen bg-sky-400'>
        {children}
      </body>
    </html>
  );
}

export default RootLayout;
