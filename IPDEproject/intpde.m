% Solves IPDE's
% Parameters
N=600; %size of domain
Tmax=25; % Maximum time
dt=0.5;%time step 
dx=1;%step size
D=0.0;%diffusion coefficient
a=0.7;%birth rate
d=0.5;%death rate
k=0.03;
sigma=0.2;
C=0.5;
L=5;
lambda=0.6;

% Initialize solutions
u=zeros(N,ceil(Tmax/dt));
v=zeros(N,ceil(Tmax/dt));

 % Initialize arrays for distributions
 expon=zeros(N,N,ceil(Tmax/dt));%Exponential distribution function
 exponI=zeros(N,N,ceil(Tmax/dt));%Exponential distribution integral function
 expon2=zeros(N,N,ceil(Tmax/dt));%Exponentially unbounded distribution function
 expon2I=zeros(N,N,ceil(Tmax/dt));%Exponentially unbounded distribution integral function
 uf=zeros(N,N,ceil(Tmax/dt));%uniform distribution function
 ufI=zeros(N,N,ceil(Tmax/dt));%uniform distribution function
 INTEGRAL=zeros(N,ceil(Tmax/dt));%full integral function
 dofx = zeros(N); % spatially varying diffusion function
 
% Initial conditions 
init = 200:240;
u(init,1)=0.5.*exp(-0.05*(init-220).*(init-220));
 for x=1:N;
 v(x,1)=1;
 end

% Begin the time iteration
 for t=1:ceil(Tmax/dt);
 
   % Each iteration we need to update our distribution functions
 for x=2:N-1  
 for y=1:x-1 
  % expon(x,y,t)=lambda.*exp(-lambda.*(x-y)); 
  % expon2(x,y,t)=lambda.*exp(-sqrt(x-y));    
    if(x-y<=L)&&(x-y>0)
    uf(x,y,t)=1/(L);
    end
 end
 end
 
 % prepare functions suitable for integration
 for x=2:N-1  
 for y=1:x   
% exponI(x,y,t)=u(y,t).*expon(x,y,t); 
% expon2I(x,y,t)=u(y,t).*expon2(x,y,t);
 ufI(x,y,t)=u(y,t).*uf(x,y,t);
 end
 end

% The integral terms - trapzesoidal rule
 for x=2:N-1;    
 Y=1:x;%%%%%%%%%%check here!
  INTEGRAL(x,t+1)=trapz(Y,ufI(x,Y,t));
% INTEGRAL(x,t+1)=trapz(Y,exponI(x,Y,t));
% INTEGRAL(x,t+1)=trapz(Y,expon2I(x,Y,t));
 end
 
% %The finite difference scheme for a single equation
% for x=2:N-1;
%  u(x,t+1)=u(x,t)+dt*D.*(u(x-1,t)+u(x+1,t)-2*u(x,t))./(dx^2)+dt*a.*u(x,t).*(1-u(x,t))-dt*d*u(x,t)+dt*INTEGRAL(x,t+1);
% end
 end
 
 
 D = 0.5;
d = 0.5;
a = 0.7;

% % diffusion model without integral term
for t=1:ceil(Tmax/dt)-1;
for x=2:N-1;
u(x,t+1)=u(x,t)+dt*(D*(u(x-1,t)+u(x+1,t)-2*u(x,t))./(dx^2)) + dt*a.*u(x,t).*(1-u(x,t))-dt*d.*u(x,t);
v(x,t+1)=v(x,t)-dt.*v(x,t).*u(x,t).*(1-u(x,t));
end
end
end
 
%plotting trajectories
 X=1:N;
 plot(X,u(X,1),'--k',X,u(X,ceil(Tmax/dt*1/8)),'-k',X,u(X,ceil(Tmax/dt*1/6)),':k',X,u(X,ceil(Tmax/dt*1/4)),'-.k',X,u(X,ceil(Tmax/dt)-1),'-+k');
 axis([180 400 0 1.9])
legend('Initial condition','t=6','t=13','t=19','t=25'); 
title('Snapshots of the evolution of u, plotted versus x, for dimensionless t');
xlabel('Dimensionless spatial variable x');
ylabel('Dimensionless density u');
%  subplot(1,2,2);plot(X,v(X,1),X,v(X,10),X,v(X,20),X,v(X,30),X,v(X,40),X,v(X,50))
%  axis([0 600 0 1.2])

