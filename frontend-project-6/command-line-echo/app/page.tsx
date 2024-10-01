import Container from './_components/Container';
import Header from './_components/Header';

function Home() {
  return (
    <div className='h-full flex flex-col shadow-sm'>
      <Header />
      <Container />
    </div>
  );
}

export default Home;
