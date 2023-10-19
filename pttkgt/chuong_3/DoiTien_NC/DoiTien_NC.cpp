#include<bits/stdc++.h>
#define Max 20
#define Infinity 100000
int n;
int S; 
int x[Max+1]; 
int y[Max+1]; 
int v[Max+1]; 
int o[Max+1]; 
int cmin; 
int vrem;
int csel; 
int bound; 

FILE *fp;
char *finp = "DoiTien_NC.inp";
char *fout = "DoiTien_NC.out";

void swap(int *x, int *y);
int init();
void SX1();
void SX2();
void Thu(int i);
void Xuat();
void GhiNhan();

int main()
{
    if (!init())
    {
        printf("Khong tim thay tep: %s", finp);
        exit(1);
    }
    SX1();
    bound = vrem / v[1];
    Thu(1);
    SX2();
    Xuat();
}

int init()
{
    int i;
    if ((fp = fopen(finp, "r")) != NULL)
    {
        fscanf(fp, "%d %d \n", &n, &S);
        for (i = 1; i <= n; i++)
        {
		    fscanf(fp, "%d", &v[i]);
        }
		fclose(fp);
        for (i = 1; i <= n; i++) x[i] = 0;
        v[n+1]=1; 
        vrem = S;
        cmin = Infinity;
        csel = 0;
        for (i = 1; i <= n; i++)
        {
		    o[i] = i;
        }
		return 1;
    }
    else return 0;
}

void swap(int *x, int *y)
{
    int e;
    e = *x;
    *x = *y;
    *y = e;
}

void SX1()
{
    int i, j, k;
    for (i = 1; i <= n - 1; i++)
    {
        k = i;
        for ( j = i + 1; j <= n; j++)
        if (v[j] > v[k]) k = j;
        if (k != i)
        {
            swap(&v[i], &v[k]); 
            swap(&o[i], &o[k]);
       } 
	} 
}

void SX2()
{
    int i, j, k;
    for (i = 1; i <= n - 1; i++)
    {
		k = i;
		for ( j = i + 1; j <= n; j++)
		if (o[j] < o[k]) k = j;
		if (k != i)
		{
			swap(&o[i], &o[k]); 
			swap(&y[i], &y[k]); 
        }   
	} 
}

void GhiNhan(int k)
{
	int i;
	if ((cmin > csel)&&(vrem == 0))
	{
		cmin = csel;
		for (i = 1; i <= k; i++)
		y[i] = x[i];
		 for (i = k + 1; i <= n; i++)
		y[i] = 0; 
	} 
}

void Thu(int i)
{
	int j;
	for (j = 0; j <= vrem/v[i]; j++)
	{
		bound = csel+j+ (vrem-j*v[i])/v[i+1];
		if (bound <= cmin)
		{
			x[i] = j; 
			csel = csel + j; 
			vrem = vrem - j * v[i];
			if ((i == n) || (vrem == 0)) GhiNhan(i);
			else Thu(i+1);
			csel = csel - j;
			vrem = vrem + j * v[i];
		} 
	} 
} 

void Xuat()
{
	int i;
	if ((fp = fopen(fout, "w")) != NULL)
	{
		fprintf(fp, "So to tien it nhat: %4d \n", cmin);
		fprintf(fp, "So to tien duoc chon: \n");
		for (i = 1; i <= n; i++)
		fprintf(fp, "%2d ", i);
		fprintf(fp, "\n");
		for (i = 1; i <= n; i++)
		fprintf(fp, "%2d ", y[i]);
		fclose(fp);
	}
	else
	 printf("Khong tim thay tep: %s", fout);
}
