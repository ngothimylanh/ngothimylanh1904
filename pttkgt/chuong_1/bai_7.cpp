#include<bits/stdc++.h>
using namespace std;
int Nhap(int x)
{
	{
		cin>>x;    
		if (x<0)   cout<<"Nhap n!"; 
	} 
	while (x<0);
	return x;
}
double Tinh(int n)
{
	double s=0;long long p=1;
	for(int i=1;i<=n;i++)
	{
		p=p*i;
		s=s+(double)1/p;
	}
	return s;
}
int main()
{
	int n; 
    cin>>n;
	cout<<Tinh(n);
}

