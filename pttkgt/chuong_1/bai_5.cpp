#include<bits/stdc++.h>
using namespace std;
float Tinh(int n)
{
	if(n==1)   return 1;   
	else return ((float)1)/n+Tinh(n-1);  
}
int main()
{
	int n;
	cin>>n;
	cout<<Tinh(n);
}
