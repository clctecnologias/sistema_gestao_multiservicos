<div> 
    @section('title' ,'Multiserviços | A energia do futuro, hoje.')
     <header class="flex md:px-17 justify-between bg-[#151515b7] items-center md:w-[98%] h-[4rem] md:rounded-full md:m-[1rem] fixed backdrop-blur-xs md:border-2 md:border-[#2E2C2C] md:shadow-[#2E2C2C] w-full px-8 z-[1000]">
        <nav class="navMobile">
            <a href="#" target="_top" class="linksMenu">Página Inicial</a>
            <a href="#sobreNos" class="linksMenu">Quem Somos?</a>
            <a href="#servicos" class="linksMenu">Serviços</a>
            <a href="#rodape" class="linksMenu">Extras</a>
            <nav class="navBotoes md:hidden">
                <a href="#"><button class="botao botaoSecundario">Entrar</button></a>
                <a href="{{ route('home_page.multiservice.site') }}"><button class="botao botaoPrimario">Começar</button></a>
            </nav>
        </nav>
        <nav class="z-1">
            <a href="{{ route('home_page.multiservice.site') }}"><img src="{{ asset('home/img/logo.png') }}" alt="imagem da logo do multisserviços" srcset="{{ asset('home/img/logo.png') }}" class="w-[120px]"></a>
          
        </nav>
        <nav class="hidden md:block">
            <nav class="navBotoes">
                <a><button class="botao botaoSecundario">Cadastre-se</button></a>
                <a href="{{ route('login') }}"><button class="botao botaoPrimario">Começar</button></a>
            </nav>
        </nav>

        <nav class="md:hidden p-2 z-1 menuHamburguer cursor-pointer ease-linear delay-75 duration-200">
            <div class="linha linha0"></div>
            <div class="linha"></div>
            <div class="linha linha2"></div>
        </nav>
    </header>

    <main class="bg-[#151515] px-8 pt-[6rem] md:px-17">
        <section class="md:flex md:h-screen items-center">
            <nav class="flex flex-col items-center text-center md:text-left md:items-start md:w-[95%]">
                <h1 class="text-[28pt] p font-bold font-roboto text-white md:text-[35pt]">A <span class="textoColorido">Energia</span> do Futuro, hoje<span class="textoColorido">.</span></h1>
                <p class="font-light my-4 text-white ">O <span class="textoDestaque">Centro Multiserviços</span> é uma empresa especializada em soluções completas na área de eletricidade, com foco na distribuição eficiente e segura de energia elétrica. Atuamos com excelência no planejamento, instalação e manutenção de sistemas elétricos, oferecendo serviços de alta qualidade para residências, empresas, indústrias e instituições públicas. Nosso objetivo é levar energia com confiança, inovação e responsabilidade, promovendo o desenvolvimento sustentável e o bem-estar da comunidade.</p>
                <nav class="navBotoes">
                    <a href="#sobreNos"><button class="botao botaoSecundario">Saber Mais</button></a>
                    <a href="#video"><button class="botao botaoPrimario">Assistir Vídeo <i class="fa-solid fa-video"></i></button></a>
                </nav>
            </nav>
            <nav>
                <img src="{{ url('/home/img/img_hero.gif') }}" alt="imagem de uma engenheira elétrica segurando uma lâmpada" srcset="{{ url('/home/img/img_hero.gif') }}">
            </nav>
        </section>

        <section id="servicos">
            <h2 class="subtitulo">Nossos <span class="textoColorido">Serviços.</span></h2>
            <div class="areaTextoSubtitulo">
                <nav>
                    <p class="textoSubtitulo">No <span class="textoDestaque">Centro Multiserviços, oferecemos uma ampla gama de soluções elétricas projetadas para atender às necessidades de residências, empresas e indústrias com máxima eficiência e segurança</span>. Combinamos conhecimento técnico, inovação e compromisso com a qualidade para entregar serviços que superam expectativas e seguem os mais altos padrões do setor elétrico</p>
                </nav>
                <nav>
                    <p class="textoSubtitulo textoSubtitulo0">Nossa equipe é formada por <span class="textoDestaque1">profissionais especializados</span>, prontos para desenvolver e executar projetos elétricos de qualquer escala.</p>
                </nav>
            </div>

            <div class="carousel-container relative flex m-auto justify-center w-full md:w-[39%]">
                <button class="carousel-button prev" aria-label="Anterior">&#10094;</button>

                <div class="contentServicos">
                    
                    <div class="cardServico">
                        <nav>
                            <i class="fa-solid fa-bolt iconeServico"></i>
                        </nav>
                        <nav>
                            <h4 class="nomeServico">Instalações Elétricas Residenciais e Comerciais</h4>
                        </nav>
                        <nav>
                            <p class="textoServico">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere recusandae numquam quas. Non neque incidunt itaque deserunt debitis possimus distinctio, explicabo doloribus, eum soluta nisi officiis quo. Quisquam, laudantium facilis.</p>
                        </nav>
                    </div>
                    
                    <div class="cardServico">
                        <nav>
                            <i class="fa-solid fa-building iconeServico"></i>
                        </nav>
                        <nav>
                            <h4 class="nomeServico">Infraestruturas de Distribuição de Energia</h4>
                        </nav>
                        <nav>
                            <p class="textoServico">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere recusandae numquam quas. Non neque incidunt itaque deserunt debitis possimus distinctio, explicabo doloribus, eum soluta nisi officiis quo. Quisquam, laudantium facilis.</p>
                        </nav>
                    </div>
                    
                    <div class="cardServico">
                        <nav>
                            <i class="fa-solid fa-screwdriver-wrench iconeServico"></i>
                        </nav>
                        <nav>
                            <h4 class="nomeServico">Manutenção Preventiva e Corretiva</h4>
                        </nav>
                        <nav>
                            <p class="textoServico">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere recusandae numquam quas. Non neque incidunt itaque deserunt debitis possimus distinctio, explicabo doloribus, eum soluta nisi officiis quo. Quisquam, laudantium facilis.</p>
                        </nav>
                    </div>
                    
                    <div class="cardServico">
                        <nav>
                            <i class="fa-solid fa-diagram-project iconeServico"></i>
                        </nav>
                        <nav>
                            <h4 class="nomeServico">Projetos e Legalização Elétrica</h4>
                        </nav>
                        <nav>
                            <p class="textoServico">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere recusandae numquam quas. Non neque incidunt itaque deserunt debitis possimus distinctio, explicabo doloribus, eum soluta nisi officiis quo. Quisquam, laudantium facilis.</p>
                        </nav>
                    </div>
                    
                </div>

                <button class="carousel-button next" aria-label="Próximo">&#10095;</button>
                
            </div>
        
            <div class="flex items-center w-full flex-col my-2">
                <button class="botao botaoPrimario">Eletrificando Angola</button>
            </div>
        </section>

        <section id="sobreNos">
            <h2 class="subtitulo">Sobre <span class="textoColorido">Nós.</span></h2>
            <div class="areaTextoSubtitulo">
                <nav>
                    <p class="textoSubtitulo">No <span class="textoDestaque">O Centro Multiserviços é uma empresa de eletricidade</span> sediada no bairro Vila Flor, município de Talatona, em Luanda – Angola, com forte atuação nos bairros Sapú II e Vila Flor. Especializados na distribuição de energia elétrica e em serviços de instalação e manutenção residencial, temos como missão garantir soluções seguras, eficientes e de alta qualidade para nossos clientes.</p>
                </nav>
                <nav>
                    <p class="textoSubtitulo textoSubtitulo0">Nosso compromisso é assegurar o fornecimento estável e contínuo de energia, contribuindo para o bom funcionamento dos sistemas elétricos domésticos e para o conforto das famílias que atendemos.</p>
                </nav>
            </div>
            <div class="contentAbout">
                <div class="cardFundador">
                    <nav>
                        <img src="{{ url('/home/img/fundadora.png') }}" alt="imagem da Maria Wandalika, diretora-executiva e co-fundadora" srcset="{{ url('/home/img/fundadora.png') }}" class="imgFundador">
                    </nav>
                    <nav>
                        <h5 class="nomeFundador">Maria Wandalika</h5>
                    </nav>
                    <nav>
                        <h5 class="cargoFundador">CEO e fundadora</h5>
                    </nav>
                    <nav>
                        <p class="sobreFundador">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, delectus harum exercitationem sit excepturi aliquam.</p>
                    </nav>
                </div>

                <div class="cardFundador top-10 z-20">
                    <nav>
                        <img src="{{ url('/home/img/fundador.png') }}" alt="imagem do Jeovani Miguel, co-diretor-executivo e co-fundador" srcset="{{ url('/home/img/fundador.png') }}" class="imgFundador">
                    </nav>
                    <nav>
                        <h5 class="nomeFundador">Jeovani Miguel</h5>
                    </nav>
                    <nav>
                        <h5 class="cargoFundador">Co-CEO e Co-fundador</h5>
                    </nav>
                    <nav>
                        <p class="sobreFundador">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, delectus harum exercitationem sit excepturi aliquam.</p>
                    </nav>
                </div>

                <div class="cardFundador top-10 z-20">
                    <nav>
                        <img src="{{ url('/home/img/fundador1.png') }}" alt="imagem do João Sessa, diretora-tecnológico e co-fundador" srcset="{{ url('/home/img/fundador1.png') }}" class="imgFundador">
                    </nav>
                    <nav>
                        <h5 class="nomeFundador">João Sessa</h5>
                    </nav>
                    <nav>
                        <h5 class="cargoFundador">Diretor Tecnológico e Co-fundador</h5>
                    </nav>
                    <nav>
                        <p class="sobreFundador">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, delectus harum exercitationem sit excepturi aliquam.</p>
                    </nav>
                </div>
            </div>
        </section>

        <section class="my-4">
            <div class="marquee-container w-full overflow-hidden relative bg-[#151515] text-white text-[25pt] flex">
                <div class="bg-[#151515] w-2.5 h-[100px] z-20"></div>
                <div class="font-inter text-[50pt] px-4 animate-marquee w-max absolute top-0 z-10 flex justify-around items-center" style="background-image: linear-gradient(90deg, #ffffff 0%, #e0e0e0 50%, rgba(238, 16, 0, 0.438) 100%); color: transparent; 
                background-clip: text;
                -webkit-background-clip: text;">
                    <nav>
                        Centro Multiserviços - A energia do futuro, hoje! - 
                        &nbsp;
                    </nav>
                    <nav>
                        Iluminando Soluções
                        &nbsp;
                    </nav>
                    <nav>
                        - Eletrificando Angola
                        &nbsp;
                    </nav>
                </div>
                <div class="bg-[#151515] w-2.5 h-[100px] z-20 bg-linear-150" style="background-image: linear-gradient(to left, #151515, rgba(56, 56, 53, 0.432));"></div>
            </div>
        </section>

        <section class="bg-[#151515]">
            <h2 class="subtitulo">E mais um <span class="textoColorido">pouco...</span></h2>
            <div class="areaTextoSubtitulo">
                <nav>
                    <p class="textoSubtitulo">Você precisa ver com seus próprios olhos como a energia do futuro já está mudando o presente. Assista ao nosso vídeo e descubra como o <span class="textoDestaque">Centro Multiserviços</span> está levando inovação, segurança e eficiência para os bairros de Luanda. Em poucos minutos, você vai entender por que somos referência em distribuição e instalação elétrica.</p>
                </nav>
            </div>
            <nav id="video">
                <video src="{{ url('/home/video/video_site.mp4') }}" class="videoExplicativo"></video>
                <nav class="navControlesVideo flex justify-around text-red-500 items-center">
                    <nav class="text-[20px] flex gap-3.5">
                        <i class="fa-solid fa-backward"></i>
                        <i class="fa-solid fa-play"></i>
                        <i class="fa-solid fa-forward"></i>
                        <i class="fa-solid fa-expand"></i>
                    </nav>
                    <nav>
                        <a href="{{ url('/home/video/centro_multisserviços.mp4') }}" download="video_centro_multiserviços">
                           <button class="botao botaoPrimario">Baixar Vídeo <i class="fa-solid fa-download"></i></button>
                        </a>
                    </nav>
                </nav>
            </nav>
        </section>

        <footer class="pt-12 py-2.5" id="rodape">
            <nav class="flex flex-col items-center justify-center text-center">
                <a href="#" target="_top" class="flex items-center flex-col justify-center text-center">
                    <img src="{{ url('/home/img/logo.png') }}" alt="" srcset="" class="w-1/2 py-2.5 md:w-[40%]">
                </a>
                
                <div class="flex gap-2 flex-col font-inter text-[#B0B0B0] font-normal md:flex-row md:gap-6">
                    <a href="#">Termos e Condições</a>
                    <a href="#">Política de Privacidade</a>
                    <a href="#sobreNos">Sobre Nós</a>
                    <a href="#servicos">Nossos Serviços</a>
                </div>
            </nav>
            <div class="flex flex-col items-center text-center md:flex-row md:justify-between md:pt-8">
                <nav>
                    <p class="text-white font-inter font-extralight py-2">Vila Flor, Luanda, Angola</p>
                </nav>
                <nav class="flex gap-12 text-[26px] text-[#B0B0B0]">
                    <a href="#"><i class="fa-brands fa-facebook-f iconeSocialMedia"></i></a>
                    <a href="#"><i class="fa-brands fa-github iconeSocialMedia"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp iconeSocialMedia"></i></a>
                    <a href="#"><i class="fa-solid fa-envelope iconeSocialMedia"></i></a>
                </nav>
                <nav>
                    <p class="font-inter font-extralight text-white">&copy;2025 - <span class="text-[#E10600] font-bold">Centro Multiserviços</span> - Todos os direitos reservados</p>
                </nav>
            </div>
        </footer>
    </main>


</div>
